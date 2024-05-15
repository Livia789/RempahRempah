<%
' Read the posted data
Dim name, city
name = Request.Form("name")
city = Request.Form("city")

' Process the data (for demonstration, we'll just concatenate them)
Dim result
result = "Hello, " & name & ". You are from " & city & "."

' Set the response content type to JSON
Response.ContentType = "application/json"

' Output the result as JSON
Response.Write "{ ""message"": """ & result & """ }"
%>
