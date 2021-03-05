var $txt = $("textarea");
var _iUserId = "";
var _oProfile = [];
	
$(function(){
	if("liff" in window){
		liff.init(successInit, errorInit);
	}
	
	/**
	 * successInit
	 * 初期化成功
	 * lifで見ている
	 */
	function successInit(p){
		_iUserId = p.context.userId;
		setEvent();
		//alert(location.href);
		//outputLog("successInit : user_id = "+p.context.userId);
		outputLog(JSON.stringify(p));
	}
	
	/**
	 * errorInit
	 * 初期化エラー
	 * →lifではない
	 */
	function errorInit(p){
		outputLog("errorInit");
	}
	
	/**
	 * openWindow
	 * アプリ内ブラウザで開く
	 */
	function openWindow(e){
		liff.openWindow({url:"https://pfq.jp",external:false});
		//自分のドメインの時はexternal:false(lifの中で次画面遷移
		//trueにすると、別タブ（デフォルトのブラウザでひらく）
//		liff.openWindow({url:"http://line.me/R/msg/text/?https://liff.pfq.jp/",external:false});
		outputLog("openWindow");
	}
	
	/**
	 * closeWindow
	 * ブラウザ閉じる
	 */
	function closeWindow(e){
		liff.closeWindow();
	}
	
	/**
	 * openWindowExternal
	 * デフォルトブラウザで開く
	 */
	function openWindowExternal(e){
		liff.openWindow({url:"https://pfq.jp",external:true});
//		liff.openWindow({url:"http://line.me/R/msg/text/?https://liff.pfq.jp/",external:true});
		outputLog("openWindowExternal");
	}
	
	/**
	 * getProfile
	 * プロフィール取得
	 */
	function getProfile(){
		liff.getProfile().then(function (profile) {
			_oProfile = profile;
			outputLog("getProfile : user_id = "+_oProfile.userId+", displayName = "+_oProfile.displayName+", pictureUrl = "+_oProfile.pictureUrl+", statusMessage = "+_oProfile.statusMessage);
		});
	}
	
	/**
	 * sendMessage
	 * メッセージ送信
	 */
	function sendMessage(iMode){
		var strText = $("#message").val();
		var iMode = parseInt($("#message_mode").val());
		var oMessage = {};
		switch(iMode){
		case 1: oMessage = {type: "text", "text": strText}; break;
		case 2: oMessage = {type: "image", "originalContentUrl": "https://liff.pfq.jp/asset/neko.jpg", "previewImageUrl": "https://liff.pfq.jp/asset/preview.jpg"}; break;
		case 3: oMessage = {type: "video", "originalContentUrl": "https://liff.pfq.jp/asset/neko.mp4", "previewImageUrl": "https://liff.pfq.jp/asset/preview.jpg"}; break;
		case 4: oMessage = {type: "audio", "originalContentUrl": "https://liff.pfq.jp/asset/neko.m4a", "duration": 60000}; break;
		case 5: oMessage = {type: "location", "title": "my location", "address": "〒150-0002 東京都渋谷区渋谷２丁目２１−１", "latitude": 35.65910807942215, "longitude": 139.70372892916203}; break;
		case 6: 
			oMessage = 
				{
					"type": "template",
					"altText": "This is a buttons template",
					"template": {
						"type": "buttons",
						"thumbnailImageUrl": "https://liff.pfq.jp/asset/neko.jpg",
						"imageAspectRatio": "rectangle",
						"imageSize": "cover",
						"imageBackgroundColor": "#FFFFFF",
						"title": "Menu",
						"text": "Please select",
						"defaultAction": {
							"type": "uri",
							"label": "View detail",
							"uri": "http://pfq.jp"
						},
						"actions": [
							{
								"type": "uri",
								"label": "View detail",
								"uri": "http://tech.pfq.jp/"
							}
						]
					}
				};
			break;
		case 7: 
			oMessage = 
			{
				"type": "template",
				"altText": "this is a confirm template",
				"template": {
					"type": "confirm",
					"text": "Are you sure?",
					"actions": [
						{
							"type": "uri",
							"label": "URL A",
							"uri": "http://pfq.jp/"
						},
						{
							"type": "uri",
							"label": "URL B",
							"uri": "http://tech.pfq.jp/"
						}
					]
				}
			}
			break;
		case 8: 
			oMessage = 
				{
				  "type": "template",
				  "altText": "this is a image carousel template",
				  "template": {
				      "type": "image_carousel",
				      "columns": [
				          {
				            "imageUrl": "https://liff.pfq.jp/asset/neko.jpg",
				            "action": {
				              "type": "uri",
				              "label": "URL A",
				              "uri": "http://pfq.jp"
				            }
				          },
				          {
				            "imageUrl": "https://liff.pfq.jp/asset/neko.jpg",
				            "action": {
				              "type": "uri",
				              "label": "URL B",
				              "uri": "http://tech.pfq.jp"
				            }
				          },
				          {
				            "imageUrl": "https://liff.pfq.jp/asset/neko.jpg",
				            "action": {
				              "type": "uri",
				              "label": "URL C",
				              "uri": "http://pfq.jp?test=1"
				            }
				          }
				      ]
				  }
				}
			break;
		case 9: 
			oMessage = 
				{  
				  "type": "flex",
				  "altText": "this is a flex message",
				  "contents": {
				    "type": "bubble",
				    "body": {
				      "type": "box",
				      "layout": "vertical",
				      "contents": [
				        {
				          "type": "text",
				          "text": "hello"
				        },
						{
						  "type": "bubble",
						  "header": {
						    "type": "box",
						    "layout": "vertical",
						    "contents": [
						      {
						        "type": "text",
						        "text": "Header text"
						      }
						    ]
						  },
						  "hero": {
						    "type": "image",
						    "url": "https://liff.pfq.jp/asset/neko.jpg"
						  },
						  "body": {
						    "type": "box",
						    "layout": "vertical",
						    "contents": [
						      {
						        "type": "text",
						        "text": "Body text"
						      }
						    ]
						  },
						  "footer": {
						    "type": "box",
						    "layout": "vertical",
						    "contents": [
						      {
						        "type": "text",
						        "text": "Footer text"
						      }
						    ]
						  },
						  "styles": {
						    "comment": "See the example of a bubble style object"
						  }
						},
						{
						  "type": "carousel",
						  "contents": [
						    {
						      "type": "bubble",
						      "body": {
						        "type": "box",
						        "layout": "vertical",
						        "contents": [
						          {
						            "type": "text",
						            "text": "First bubble"
						          }
						        ]
						      }
						    },
						    {
						      "type": "bubble",
						      "body": {
						        "type": "box",
						        "layout": "vertical",
						        "contents": [
						          {
						            "type": "text",
						            "text": "Second bubble"
						          }
						        ]
						      }
						    }
						  ]
						},
						{
						  "type": "box",
						  "layout": "vertical",
						  "contents": [
						    {
						      "type": "image",
						      "url": "https://liff.pfq.jp/asset/neko.jpg"
						    },
						    {
						      "type": "separator"
						    },
						    {
						      "type": "text",
						      "text": "Text in the box"
						    }
						  ]
						},
						{
						  "type": "button",
						  "action": {
						    "type": "uri",
						    "label": "Tap me",
						    "uri": "http://pfq.jp"
						  },
						  "style": "primary",
						  "color": "#0000ff"
						},
						{
						  "type": "icon",
						  "url": "https://liff.pfq.jp/asset/neko.jpg",
						  "size": "lg",
						  "aspectRatio": "1.91:1"
						},
						{  
						   "type":"camera",
						   "label":"Camera"
						},
						{  
						   "type":"cameraRoll",
						   "label":"Camera roll"
						}
				      ]
				    }
				  }
				}
			break;
		}
		liff.sendMessages([oMessage])
		.then(function () {
			outputLog("sendMessages : mode = " + iMode);
		})
		.catch(function (error) {
			outputLog("sendMessages error : mode = " + iMode + error);
		});
	}
	
	/**
	 * ajaxInternal
	 * ajax同一ドメイン
	 * →普通にできる　今回はいつも通り書くので大丈夫
	 */
	function ajaxInternal(){
		$.ajax({
			type: "POST",
			url:'https://liff.pfq.jp/post.php',
			data: "name=John&location=Boston",
			error:function(req,txt,e){
				alert(req.status);
				alert(txt);
			},
			success: function(msg){
				outputLog("ajaxInternal : message = " + JSON.stringify(msg));
			}
		});
	}
	
	/**
	 * ajaxExternal
	 * ajax外部ドメイン
	 */
	function ajaxExternal(){
		$.ajax({
			type: "POST",
			url:'https://dev5.pfq.jp/post.php',
			data: "name=John&location=Boston",
			error:function(req,txt,e){
				alert(req.status);
				alert(txt);
			},
			success: function(msg){
				outputLog("ajaxExternal : message = " + JSON.stringify(msg));
			}
		});
	}
	
	/**
	 * setEvent
	 */
	function setEvent(){
		$("#open_window").on("click",openWindow);
		$("#open_window_external").on("click",openWindowExternal);
		$("#get_profile").on("click",getProfile);
		$("#send_message").on("click",sendMessage);
		$("#close_window").on("click",closeWindow);
		$("#ajax_internal").on("click",ajaxInternal);
		$("#ajax_external").on("click",ajaxExternal);
	}
	
	/**
	 * outputLog
	 */
	function outputLog(str){
		$txt.val($txt.val()+str+"\n");
	}
});