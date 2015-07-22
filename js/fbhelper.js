      FB.init({appId: "470691686428254", status: true, cookie: true});
      function postToFeed(link, name, description, caption ,img,adId, orderId ) {
        
        var obj = {
          method: 'feed',
          href: 'https://developers.facebook.com/docs/',
          redirect_uri: 'http://demomglobally.com',
          link: link,
          name: name,
          caption: caption,
          description: description,
          picture : img,
          actions: [{name: link, link: link}]
          
      };
        function callback(response) {
            $.ajax({
            type: "post",
            url: "/MoneyTransfer/adrpfund",
            data: { "socialId": "1", "adId" : adId , "orderId" : orderId } ,
            success: function (msg) { 
                alert("Post was published on facebook."); 
                location.reload();
            }
        });
          document.getElementById('msg').innerHTML = "Post ID: " + response['post_id'];
        }
 
        FB.ui(obj, callback);
      }
        function postToFeedInvite(link, name, description, caption ,img) {
          
        var obj = {
          method: 'feed',
          href: 'https://developers.facebook.com/docs/',
          redirect_uri: 'http://demomglobally.com',
          link: link,
          name: name,
          caption: caption,
          description: description,
          picture : img
      };
      
        function callback(response) { //alert(1);
          //document.getElementById('msg').innerHTML = "Post ID: " + response['post_id'];
        }
 
        FB.ui(obj, callback);
      }
