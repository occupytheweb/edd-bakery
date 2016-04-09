@echo off
SETLOCAL EnableDelayedExpansion
for /F "tokens=1,2 delims=#" %%a in ('"prompt #$H#$E# & echo on & for %%b in (1) do rem"') do (
  set "DEL=%%a"
)

<nul > X set /p ".=."


IF [%1]==compile (
	call :compile
	goto :eof
) ELSE (
    IF %1==decompile (
        copy admin.hta admin.html > NUL
        call :color 04 "Decompilation Completed at %TIME%"
        echo(
    ) ELSE (
        copy admin.html admin.hta > NUL
        call :color 03 "Build Completed at %TIME%"
        echo(
    )
)

DEL X > NUL
goto :eof

:color
set "param=^%~2" !
set "param=!param:"=\"!"
findstr /p /A:%1 "." "!param!\..\X" nul
<nul set /p ".=%DEL%%DEL%%DEL%%DEL%%DEL%%DEL%%DEL%"
exit /b


:compile
set separator=____________________________________________________________________________________________________________________________________________
set ostream=merge_compile
@echo off
echo Starting compilation at %TIME%
echo Compilation start %TIME% > %ostream%
echo. >> %ostream%
for %%l in (*) do (
  if not %%l==%ostream% (
    echo %separator% >> %ostream%
	echo %%l >> %ostream%
	echo %separator% >> %ostream%
	type %%l >> %ostream%
	echo. >> %ostream%
  )
)
echo Compilation Completed at %TIME% >> %ostream%
call :color 06 "Compilation Completed at %TIME%"
echo(
exit /b