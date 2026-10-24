<#
.SYNOPSIS
	Compila el CSS de Tailwind del tema TRIADE sin necesidad de Node.js.

.DESCRIPTION
	Usa el binario oficial de Tailwind CSS (standalone) que se descarga en
	tools/tailwindcss.exe la primera vez. El resultado se escribe en
	wordpress/wp-content/themes/triade/assets/css/tailwind.css.

.EXAMPLE
	pwsh scripts/build-css.ps1
#>

$ErrorActionPreference = 'Stop'
$root = Split-Path -Parent $PSScriptRoot
$bin = Join-Path $root 'tools\tailwindcss.exe'

if (-not (Test-Path $bin)) {
	New-Item -ItemType Directory -Force -Path (Split-Path $bin) | Out-Null
	$url = 'https://github.com/tailwindlabs/tailwindcss/releases/download/v3.4.17/tailwindcss-windows-x64.exe'
	Write-Host "Descargando Tailwind CSS standalone..."
	curl.exe -L --fail --silent --show-error $url -o $bin
}

Push-Location $root
try {
	& $bin -c tailwind.config.js -i src/tailwind.css -o wordpress/wp-content/themes/triade/assets/css/tailwind.css --minify
	if ($LASTEXITCODE -ne 0) {
		throw "Tailwind falló con código $LASTEXITCODE"
	}
	Write-Host "CSS compilado en wordpress/wp-content/themes/triade/assets/css/tailwind.css"
}
finally {
	Pop-Location
}
