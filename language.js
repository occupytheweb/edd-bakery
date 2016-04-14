"use strict";


var transcript = {};


transcript.target     = {
                         doc  : null,

                         lang : null,

                         set  : function(doc, lang) {
                            transcript.target.doc  = doc;
                            transcript.target.lang = lang;
                         }
};


transcript.components = {
    lexemes          : {
                         map  : null,

                         get  : function(id) { return transcript.components.lexemes.map[id].dataset.text; },

                         set  : function(idx, text) {
                            var node = transcript.components.lexemes.map[idx];
                            node.textContent = text;
                        },

                         init : function() {
                             transcript.components.lexemes.map = dom.get('[data-text]');
                         }
                       },


    text_nodes       : {
                         nodes : null,

                         init  : function() {
                             var nodes   = [];
                             var lexemes = transcript.components.lexemes.map;

                             for (var i = 0; i < lexemes.length; i++) {
                                nodes.push(lexemes);
                             }

                            transcript.components.text_nodes.nodes = nodes;
                         }
                       }
};


transcript.phrasemap  = {
                          source : null,

                          set    : function(srcDoc) {
                             transcript.phrasemap.source = srcDoc;
                          },

                          get    : function() {
                              var target = 'web/language/' + transcript.target.doc + '.xml';
                              ajax.get(target, null, function(response) { transcript.phrasemap.set(response); }, 'xml');
                          }
};


transcript.update    = function(targetLanguage) {
    var root     = transcript.phrasemap.source.documentElement;
    var langRoot = xml.tag_by_attrib(root, 'transcript', 'lang', targetLanguage);
    var thisID, sourceNode, newText, i;

    for (i = 0; i < transcript.components.text_nodes.nodes.length; i++) {
        thisID     = transcript.components.lexemes.get(i);
        try {
            sourceNode = xml.tag_by_attrib(langRoot, 'extract', 'id', thisID);
            newText    = xml.text_value(sourceNode);
        } catch(e) {}

        transcript.components.lexemes.set(i, newText);
    }
};


transcript.init      = function(page, lang) {
    transcript.components.lexemes.init();
    transcript.components.text_nodes.init();
    transcript.target.set(page);
    transcript.phrasemap.get();
};