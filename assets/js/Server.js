var express = require('express');
var bodyParser = require('body-parser');
var mysql = require('mysql');

var client = mysql.createConnection({
	user: 'root',
	password: 'SQL 비밀번호 각자 개개인이 임의설정한 비밀번호이다.',
	database: 'Company'
});

var app = express();
app.use(express.static("public"));
app.use(bodyParser.urlencodec({ extended: false}));

app.get('/guest', function(request, response){
	client.query('SELECT * FROM guest', function(error, data){
		response.send(data);
	});
});

app.get('/guest/:id', function(request, response){
	var id = Number(request.params.id);

	client.query('SELECT * FROM guest WHERE id=?', [
		id
	], function(error, data){
		response.send(data);
	});
});

app.post('/guest', function(request, response){

	var name = request.body.name;
	var content = request.body.content;

	client.query('INSERT INTO guest(name, content) VALUES(?,?)',[
		name, content
	], function(error, data){
		response.send(data);
	});
});

app.put('/guest/:id', function(request, response){
	var id = Number(request.params.id);
	var name = request.body.name;
	var content = request.body.content;
	var query = 'UPDATE guest SET';

	if (name) query += 'name="' + name + '",';
	if (content) query += 'content="' + content +'",';
	query += 'WHERE id=' + id;

	client.query(query, function(error, data){
		response.send(data);
	})
})

app.delete('/guest/:id', function(request, response){
	var id = Number(request.params.id);

	client.query('DELETE FROM guest WHERE id=?', [
		id
	], function(error, data){
		response.send(data);
	});
});

app.listen(52273, function(){
	console.log('Server Running at http://127.0.0.1:52273');
});