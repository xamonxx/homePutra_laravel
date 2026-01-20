
$ErrorActionPreference = "Stop"
$path = "c:\laragon\www\landingpage_homeputra\homeputra-laravel\resources\views\frontend\partials\contact.blade.php"
$content = Get-Content -Path $path -Raw

Write-Host "Reading file..."
# Regex:
# fetch\('\{\{ route\(' matches fetch('{{ route('
# \s+ matches the newline and spaces
# api\.contact\.submit ' matches api.contact.submit '
# \) \}\}', \{ matches ) }}', {
$pattern = "fetch\('\{\{ route\('\s+api\.contact\.submit '\) \}\}', \{"
$replacement = "fetch('{{ route('api.contact.submit') }}', {"

if ($content -match $pattern) {
    Write-Host "Pattern matched!"
    $newContent = $content -replace $pattern, $replacement
    Set-Content -Path $path -Value $newContent -NoNewline -Encoding UTF8
    Write-Host "File updated."
} else {
    Write-Host "Pattern NOT matched."
    $idx = $content.IndexOf("fetch('{{ route('")
    if ($idx -ge 0) {
       Write-Host "Found substring start:"
       Write-Host $content.Substring($idx, 100)
    }
}
