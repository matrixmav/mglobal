      FB.init({appId: "1631227090425674", status: true, cookie: true});
      function postToFeed(link, name, description, caption) {
          
        var obj = {
          method: 'feed',
          href: 'https://developers.facebook.com/docs/',
          redirect_uri: 'http://shareapp.dev',
          link: link,
          name: name,
          caption: caption,
          description: description
      };
      
        function callback(response) {
          document.getElementById('msg').innerHTML = "Post ID: " + response['post_id'];
        }
 
        FB.ui(obj, callback);
      }
        function postToFeedInvite(link, name, description, caption) {
          
        var obj = {
          method: 'feed',
          href: 'https://developers.facebook.com/docs/',
          redirect_uri: 'http://shareapp.dev',
          link: link,
          name: name,
          caption: caption,
          description: description
      };
      
        function callback(response) {
          document.getElementById('msg').innerHTML = "Post ID: " + response['post_id'];
        }
 
        FB.ui(obj, callback);
      }
