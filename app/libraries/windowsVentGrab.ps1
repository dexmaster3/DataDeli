$request = [System.Net.WebRequest]::Create("http://localhost/ventupdate/89uiojdrtd57")
$response = $request.GetResponse()
$response.Close()