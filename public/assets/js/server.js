var http = require('http');
var md5 = require('MD5');

httpServer = http.createServer(function(req,res) {
	res.end('Hello World !');
});

httpServer.listen(1337);

var io = require('socket.io').listen(httpServer);

io.sockets.on('connection', function(socket) {

	socket.on('launch_game', function(){
		io.sockets.emit('launch_game');
	})

	socket.on('re_launch_game', function(){
		io.sockets.emit('launch_game');
	})

	socket.on('are_you_ready', function(){
		socket.broadcast.emit('are_you_ready');
	})

	socket.on('lose', function(){
		socket.broadcast.emit('win');
	})

	socket.on('pause', function(){
		io.sockets.emit('pause');
	})

	socket.on('restart', function(){
		io.sockets.emit('restart');
	})

	socket.on('piege', function(id){
		if(id == 0) {
			socket.broadcast.emit('reduire_vitesse_balle');
		} else if (id == 1) {
			socket.broadcast.emit('augmenter_vitesse_balle');
		} else if (id == 2) {
			socket.broadcast.emit('strong_briques');
		}
	})

	socket.on('login', function(user){
		utilisateur = user;
		utilisateur.id = user.username;
		utilisateur.image = 'https://gravatar.com/avatar/' + md5(user.email) + '?s=50';
		// Tous les utilisateurs SAUF l'actuel
		//socket.broadcast.emit('new_user');
		// Tous les utilisateurs
		io.sockets.emit('new_user');
	})

	socket.on('disconnect', function(){
		socket.broadcast.emit('stop');
	})

});
