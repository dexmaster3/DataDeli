@ECHO OFF

REM The following directory is for .NET 2.0
set DOTNETFX2=%SystemRoot%\Microsoft.NET\Framework\v4.0.30319
set PATH=%PATH%;%DOTNETFX2%

echo Installing WindowsService1...
echo ---------------------------------------------------
InstallUtil /i WindowsService1.exe
echo ---------------------------------------------------
echo Done.