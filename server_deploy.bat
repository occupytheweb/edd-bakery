@echo off
SETLOCAL EnableDelayedExpansion
for /F "tokens=1,2 delims=#" %%a in ('"prompt #$H#$E# & echo on & for %%b in (1) do rem"') do (
  set "DEL=%%a"
)
<nul > X set /p ".=."



CHOICE /C se /M "[s] to start setup or [e] to exit"
IF errorlevel 2 goto :eof
IF errorlevel 1 goto :init


:init
set daemon_name=mysqld.exe
for /f "tokens=1 delims=" %%b in ('qprocess^|find /i /c /n "%daemon_name%"') do (
  set server_running=%%b
)

IF %server_running% GEQ 1 (
  call :color 04 "Daemon running. Killing..."
  echo.
  taskkill -f /IM %daemon_name%
) ELSE (
  call :color 06 "Daemon not running. Starting Initialisation..."
  echo.
)

set ini_stmt=SET PASSWORD for 'root'@'localhost' = PASSWORD('superuser');
set sqldir=C:\xampp\mysql\bin
set def=%sqldir%\my.ini
set ini_file=init.txt

echo %ini_stmt% > %ini_file%
echo query   : %ini_stmt%
echo init    : %ini_file%
echo defaults: %def%

goto :eof
%sqldir%\mysqld --defaults-file=%def% --init-file=%ini_file%

DEL %ini_file%

DEL X > NUL

call :color 03 "Initialisation completed at %TIME%"

goto :eof




exit /b


:color
set "param=^%~2" !
set "param=!param:"=\"!"
findstr /p /A:%1 "." "!param!\..\X" nul
<nul set /p ".=%DEL%%DEL%%DEL%%DEL%%DEL%%DEL%%DEL%"
exit /b