@echo off
REM Deploy to Plato Intel Server via rsync
REM Requires: WinSCP or rsync installed

set SERVER_HOST=93.125.99.147
set SERVER_USER=platoint
set SERVER_PATH=/home/platoint/www/plato-intel.by

echo =====================================
echo   PLATO INTEL - Deploy to Server
echo =====================================
echo.
echo Files to deploy:
echo - All project files EXCEPT:
echo   node_modules/
echo   vendor/
echo   .git/
echo   *.log
echo   .env
echo.
echo Target: %SERVER_USER%@%SERVER_HOST%:%SERVER_PATH%
echo.

REM Create exclude file
(
echo node_modules/
echo vendor/
echo .git/
echo .env
echo *.log
echo .idea/
echo .vscode/
echo composer.phar
echo composer-setup.php
echo tests/
echo .docker
echo Dockerfile
echo render.yaml
echo deploy*
) > "%TEMP%\deploy-exclude.txt"

echo Exclude file created
echo.
echo Starting deployment...
echo.

REM Try rsync if available
where rsync >nul 2>nul
if %ERRORLEVEL% EQU 0 (
    rsync -avz --delete ^
        --exclude-from="%TEMP%\deploy-exclude.txt" ^
        -e "ssh -p 22" ^
        --progress ^
        "f:\Work\plato-intel2\" ^
        %SERVER_USER%@%SERVER_HOST%:%SERVER_PATH%/
    
    if %ERRORLEVEL% EQU 0 (
        echo.
        echo =====================================
        echo   Deploy Complete!
        echo =====================================
        echo.
        echo Next steps on server:
        echo 1. SSH to server: ssh %SERVER_USER%@%SERVER_HOST%
        echo 2. Run: cd %SERVER_PATH%
        echo 3. Run: composer install --optimize-autoloader
        echo 4. Run: pnpm install --production
        echo 5. Run: pnpm run build
        echo 6. Run: php artisan migrate --force
        echo 7. Run: php artisan optimize
        echo.
    ) else (
        echo.
        echo Rsync failed! Please deploy manually.
        echo.
    )
) else (
    echo Rsync not found. Please use WinSCP or install rsync.
    echo.
    echo Alternative: Use the deploy-to-server.bat script
    echo.
)

REM Cleanup
del "%TEMP%\deploy-exclude.txt"

pause
