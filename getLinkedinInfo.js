document.addEventListener('load', loadInfo);

var loadInfo = async function()
{
	console.log("ATTEMPTING TO LOAD ABOUT");
	//get the linkedin profile link from the NAV
	var data = document.getElementById('linkedin').href;
	
	await fetch('getAboutContent.php', {
		method: 'GET',
		mode: 'cors',
		headers: {'Content-Type' : 'application/json'},
		params: JSON.stringify(data)
	})
	.then((response) => {
		if (!response.ok) {
			throw new Error('Network response was not ok');
		}
		console.log(response);
		return response.about;
	})
	.then((aboutText) => {
		console.log(aboutText);
	});
}