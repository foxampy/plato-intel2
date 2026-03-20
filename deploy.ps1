# Deploy to Plato Intel Server
# PowerShell Deploy Script

$serverHost = "93.125.99.147"
$serverUser = "platoint"
$serverPath = "/home/platoint/www/plato-intel.by"
$sshKeyPath = "C:\Users\Win10_Game_OS\.ssh\plato_intel_key"

Write-Host "=====================================" -ForegroundColor Cyan
Write-Host "  PLATO INTEL - Deploy to Server" -ForegroundColor Cyan
Write-Host "=====================================" -ForegroundColor Cyan
Write-Host ""

# Step 1: Build assets
Write-Host "[1/4] Building assets..." -ForegroundColor Yellow
pnpm run build
if ($LASTEXITCODE -ne 0) {
    Write-Host "Build failed!" -ForegroundColor Red
    exit 1
}

# Step 2: Commit changes
Write-Host ""
Write-Host "[2/4] Committing changes..." -ForegroundColor Yellow
git add -A
git commit -m "Deploy: $(Get-Date -Format 'yyyy-MM-dd HH:mm:ss')"
if ($LASTEXITCODE -ne 0) {
    Write-Host "Commit failed!" -ForegroundColor Red
    exit 1
}

# Step 3: Push to GitHub
Write-Host ""
Write-Host "[3/4] Pushing to GitHub..." -ForegroundColor Yellow
git push origin main
if ($LASTEXITCODE -ne 0) {
    Write-Host "Push to GitHub failed!" -ForegroundColor Red
    exit 1
}

# Step 4: Deploy to server via rsync
Write-Host ""
Write-Host "[4/4] Deploying to server..." -ForegroundColor Yellow
Write-Host "Server: $serverUser@$serverHost" -ForegroundColor Green
Write-Host "Path: $serverPath" -ForegroundColor Green
Write-Host ""

# Files to exclude from deployment
$excludeFiles = @(
    "node_modules/",
    "vendor/",
    ".git/",
    ".env",
    ".env.server",
    "*.log",
    ".idea/",
    ".vscode/"
)

# Create exclude file
$excludeFile = "deploy-exclude.txt"
$excludeFiles | Out-File -FilePath $excludeFile -Encoding utf8

# Deploy using rsync (requires Git Bash or WSL)
$sourcePath = (Get-Location).Path + "/"
rsync -avz --delete `
    --exclude-from=$excludeFile `
    -e "ssh -i $sshKeyPath -o StrictHostKeyChecking=no" `
    $sourcePath `
    ${serverUser}@${serverHost}:${serverPath}/

if ($LASTEXITCODE -ne 0) {
    Write-Host "Rsync failed! Trying alternative method..." -ForegroundColor Yellow
    
    # Alternative: Create archive and upload
    $archiveName = "deploy-$(Get-Date -Format 'yyyyMMdd-HHmmss').zip"
    Write-Host "Creating archive: $archiveName" -ForegroundColor Yellow
    
    # Compress files (excluding node_modules, vendor, .git)
    Compress-Archive -Path * `
        -DestinationPath $archiveName `
        -Force `
        -Exclude @("node_modules", "vendor", ".git", "*.log")
    
    Write-Host "Archive created. Please upload manually via FTP/SFTP" -ForegroundColor Yellow
    Write-Host "Archive: $archiveName" -ForegroundColor Green
}

# Cleanup
Remove-Item $excludeFile -ErrorAction SilentlyContinue

Write-Host ""
Write-Host "=====================================" -ForegroundColor Cyan
Write-Host "  Deploy Complete!" -ForegroundColor Green
Write-Host "=====================================" -ForegroundColor Cyan
Write-Host ""
Write-Host "Next steps:" -ForegroundColor Yellow
Write-Host "1. SSH to server: ssh -i $sshKeyPath $serverUser@$serverHost"
Write-Host "2. Run: cd $serverPath && composer install --no-dev -o"
Write-Host "3. Run: php artisan migrate --force"
Write-Host "4. Run: php artisan config:cache"
Write-Host "5. Run: php artisan route:cache"
Write-Host "6. Run: php artisan view:cache"
Write-Host ""
