<html>
    <head>

    </head>
    <body>
        <div class="row">
            <div class="col-lg-12">
                Js-check-blade
            </div>
        </div>
    </body>
<script>
    var ManafaApp= ManafaApp || {};
    ManafaApp.CommmonUtil={
        log: function(message){console.log(message);},
    };
var myNamespace = myNamespace || {};
console.log(myNamespace);
myNamespace.module = (function () {
  var privateVar = 'private variable';
  function privateFunction() {
    console.log('private function');
  }
  return {
    publicVar: 'public variable',
    publicFunction: function() {
      console.log('public function');
    }
  };
})();
console.log(ManafaApp.CommmonUtil.log("hamza"));
</script>
    </html>
