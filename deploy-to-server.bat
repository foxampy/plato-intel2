@echo off
REM Plato Intel - Deploy to Server via SFTP
REM Requires: WinSCP installed

set SERVER_HOST=93.125.99.147
set SERVER_USER=platoint
set SERVER_PATH=/home/platoint/www/plato-intel.by

echo =====================================
echo   PLATO INTEL - Deploy to Server
echo =====================================
echo.

REM Create WinSCP script
(
echo option batch abort
echo option confirm off
echo open sftp://%SERVER_USER%@%SERVER_HOST% -password=*
echo put -r -exclude "node_modules;vendor;.git;*.log;.idea;.vscode" "f:\Work\plato-intel2\*" %SERVER_PATH%/
echo exit
) > "%TEMP%\winscp_script.txt"

REM Execute WinSCP
"%ProgramFiles(x86)%\WinSCP\WinSCP.com" /script="%TEMP%\winscp_script.txt"

REM Cleanup
del "%TEMP%\winscp_script.txt"

echo.
echo =====================================
echo   Deploy Complete!
echo =====================================
echo.
echo Next steps on server:
echo 1. SSH to server: ssh platoint@93.125.99.147
echo 2. Run: cd %SERVER_PATH%
echo 3. Run: composer install --no-dev -o
echo 4. Run: pnpm install --production
echo 5. Run: pnpm run build
echo 6. Run: php artisan migrate --force
echo 7. Run: php artisan optimize
echo.

pause
