    <html>

    <head>

    </head>

    <body>
        <div class="row">
            <div class="col-md-12">
                @php
                    $GLOBALS['x']=2;
                    $GLOBALS['y']=3;
                    function add(){
                        $GLOBALS['z']=$GLOBALS['x']+$GLOBALS['y'];
                    }
                    add();
                    echo  $GLOBALS['z'];
                @endphp

            </div>
        </div>

    </body>
    {{-- <script src="{{ resource_path('js/app.js') }}"></script> --}}
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>
        $(async function() {
            console.log('before calling');
            try {
                let result = await hello();
                result.then((result) => {
                    console.log(result);
                }).catch((err) => {
                    console.log(err);

                });
            } catch (error) {
                console.log(error);
            }
        });


        let hello = async () => {
            new Promise((resolve, reject) => {
                resolve("Oops, something went wrong!");
            });
        }
    </script>

    </html>
