

// 建立websocket链接
ws = new WebSocket("ws://www.workerman.net:7272");
// 当websocket连接建立成功时
ws.onopen = function() {
    alert('websocket 打开成功');	  
};
// 当收到服务端的消息时
ws.onmessage = function(e) {
    // e.data 是服务端发来的数据
    alert(e.data);
};
// 当websocket关闭时
ws.onclose = function() {
    alert("websocket 连接关闭");
};
// 当出现错误时
ws.onerror = function() {
    alert("出现错误");
};

