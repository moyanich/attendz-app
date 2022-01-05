<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="emerald">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Attendz') }} | @yield('title')</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}" defer></script>
    
    </head>
    <body class="bg-white">
        <div x-data="{ sidebarOpen: false }" class="flex h-screen font-roboto">
            @include('partials.sidebar')
            
            <div class="flex-1 flex flex-col overflow-hidden">
                @include('partials.header')

                <main class="flex-1 overflow-x-hidden overflow-y-auto">
                    <div class="container mx-auto">
                        <header class="px-6 py-8">
                            <div class="w-full mb-4">
                                <div class="flex flex-row items-center justify-between">
                                    {{ $header }}
                                </div>
                            </div>
                        </header>
                      
                        <div class="main-content p-4">
                            {{ $slot }}
                        </div>
                    </div>
                </main>
            </div>
        </div>



        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
       

        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.11.0/b-2.0.0/b-colvis-2.0.0/b-html5-2.0.0/b-print-2.0.0/r-2.2.9/sc-2.0.5/sl-1.3.3/datatables.min.js"></script>

        // CKeditor
        <script src="//cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>



        {{-- Modal Scripts --}}
        <script>
            function closeAlert(event){
                let element = event.target;
                while(element.nodeName !== "BUTTON"){
                element = element.parentNode;
                }
                element.parentNode.parentNode.removeChild(element.parentNode);
            }
        </script>

        <script type="text/javascript">
            function toggleModal(modalID){
                document.getElementById(modalID).classList.toggle("hidden");
                document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
                document.getElementById(modalID).classList.toggle("flex");
                document.getElementById(modalID + "-backdrop").classList.toggle("flex");
            }
        </script>
        {{-- End Modal Scripts --}}

        {{-- Select2 Script --}}
        <script>
            jQuery(document).ready(function() {
                $('.js-department-select').select2({
                    //minimumResultsForSearch: 20 // at least 20 results must be displayed
                });
            });
        </script>

        <script type="text/javascript">
            $(document).ready(function () {
                $('.ckeditor').ckeditor();
            });
        </script>

        <script type="text/javascript">
            CKEDITOR.replace('wysiwyg-editor', {
                filebrowserUploadUrl: "{{route('admin.ckeditor.image-upload', ['_token' => csrf_token() ])}}",
                filebrowserUploadMethod: 'form'
            });
        </script>


    </body>
</html>




