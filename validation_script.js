function validateForm()
{
	var name = document.forms['registration']['name'].value;
	var emailid= document.forms['registration']['email'].value;
	var roll = document.forms['registration']['roll'].value;
	var image = document.forms['registration']['image'].value;
	if(name=="")
	{
		alert('Name if required');
		return false;
	}
	if(emailid=="")
	{
		alert('emailid is required');
		return false;
	}
	if(roll=="")
	{
		alert('Roll if required');
		return false;
	}
	else if(roll<0 || isNaN(roll))
		{
			alert("Roll Number must be greater than 1 !");
			return false;
		}
	if(image=="")
	{
		alert('Image if required');
		return false;
	}
}