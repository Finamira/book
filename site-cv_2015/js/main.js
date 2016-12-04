$(document).ready(function() {
			$("#information").hide();
			$("#album").hide();
			$("#contacts").hide();
			//click sur Présentation
			$("#infos").click(function() {
				$("#home").fadeOut(800);
			});
			$("#infos").click(function() {
				$("#album").fadeOut(800);
			});
			$("#infos").click(function() {
				$("#contacts").fadeOut(800);
			});
			$("#infos").click(function() {
				$("#information").fadeIn(1000);
			});
			//click sur Réalisations
			$("#imags").click(function() {
				$("#home").fadeOut(800);
			});
			$("#imags").click(function() {
				$("#information").fadeOut(800);
			});
			$("#imags").click(function() {
				$("#contacts").fadeOut(800);
			});
			$("#imags").click(function() {
				$("#album").fadeIn(1000);
			});
			//click sur Me contacter
			$("#contact").click(function() {
				$("#home").fadeOut(800);
			});
			$("#contact").click(function() {
				$("#information").fadeOut(800);
			});
			$("#contact").click(function() {
				$("#album").fadeOut(800);
			});
			$("#contact").click(function() {
				$("#contacts").fadeIn(1000);
			});
			//click sur Pierre Alberti
			$(".redirect").click(function() {
				$("#information").fadeOut(800);
			});
			$(".redirect").click(function() {
				$("#album").fadeOut(800);
			});
			$(".redirect").click(function() {
				$("#contacts").fadeOut(800);
			});
			$(".redirect").click(function() {
				$("#home").fadeIn(1000);
			});
		});