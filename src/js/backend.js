(function() {

//generate link to manual in admin above a page editor
document.addEventListener('DOMContentLoaded', function () {

	setTimeout(function(){//dom renders too slow here

		let a = document.createElement('a');
		a.appendChild(document.createTextNode("Manual: How to Edit This Site"));
		a.href = "https://docs.google.com/document/d/1kz3Ro3UBYZN_Bs9fMca8TM-iNIY8vPEKTF7ON4kv1co/edit?usp=drivesdk";
		a.className = "manual-link";//styled in backend.css
		a.target = "_blank";
		document.getElementById("editor").appendChild(a);

	}, 1500)
});//DOMContentLoaded

})();


