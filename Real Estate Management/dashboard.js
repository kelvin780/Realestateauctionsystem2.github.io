
	const butClick = document.querySelectorAll('.tab');


	const listCont = document.querySelectorAll('.list');
	console.log(listCont);
	const bid = document.querySelector('.bid');
	const addAdmin = document.querySelector('.add-admin');
	const addVideo = document.querySelector('.upload');
	const viewAdmins = document.querySelector('.view-adminnew');
			
	listCont[1].addEventListener('click', function () {
	addAdmin.classList.add('display');
	addAdmin.classList.remove('remove');
	addVideo.classList.add('remove');
	viewAdmins.classList.remove('display');
	bid.classList.add('remove');
	bid.classList.remove('display');

		});

	listCont[0].addEventListener('click', function () {
	addAdmin.classList.remove('display');
	addVideo.classList.remove('remove');
	viewAdmins.classList.remove('display');
	bid.classList.add('remove');
	bid.classList.remove('display');
		});

	listCont[2].addEventListener('click', function () {
	addAdmin.classList.add('remove');
	addAdmin.classList.remove('display');
	addVideo.classList.add('remove');
	viewAdmins.classList.add('display');
	bid.classList.add('remove');
	bid.classList.remove('display');
		});

	listCont[3].addEventListener('click', function () {
	addAdmin.classList.add('remove');
	addAdmin.classList.remove('display');
	addVideo.classList.add('remove');
	viewAdmins.classList.remove('display');
	bid.classList.remove('remove');
	bid.classList.add('display');

		});

