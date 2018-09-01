// var io = require('socket.io')(6001);
// console.log('Connected to port 6001');
// io.on('error',function(socket){
//     console.log('error')
// });
// io.on('connection',function(socket){
//     console.log('someone connected'+socket.id)
// });
// var Redis = require('ioredis');
//
// var redis = new Redis(8888);
// redis.psubscribe("*",function(error,count){
//     //
// });
// redis.on('pmessage',function(partner,channel,message){
//     console.log(channel);
//     console.log(message);
//     console.log(partner);
//
//     message = JSON.parse(message);
//     io.emit(channel+":"+message.event,message.data.message)
//     console.log('Sent')
// });