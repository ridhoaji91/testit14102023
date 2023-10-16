<!DOCTYPE html>
<html>

<head>
    <title>Simple Crud Ajax</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            //load data mahasiswa saat aplikasi dijalankan 
            loadData();

            //Load form add
            $("#contentData").on("click", "#addButton", function() {
                $.ajax({
                    url: 'add.php',
                    type: 'get',
                    success: function(data) {
                        $('#contentData').html(data);
                    }
                });
            });

            $("#contentData").on("click", "#EditButton", function() {
                var Nip = $(this).attr("value");
                $.ajax({
                    url: 'edit.php',
                    type: 'get',
                    data: {
                        Nip: Nip
                    },
                    success: function(data) {
                        $('#contentData').html(data);
                    }
                });
            });

            $("#contentData").on("click", "#cancelButton", function() {
                loadData();
            });

            $("#contentData").on("submit", "#formAdd", function(e) {
                e.preventDefault();
                $.ajax({
                    url: 'service.php?action=save',
                    type: 'post',
                    data: $(this).serialize(),
                    success: function(data) {
                        alert(data);
                        loadData();
                    }
                });
            });

            $("#contentData").on("submit", "#formEdit", function(e) {
                e.preventDefault();
                $.ajax({
                    url: 'service.php?action=edit',
                    type: 'post',
                    data: $(this).serialize(),
                    success: function(data) {
                        alert(data);
                        loadData();
                    }
                });
            });

            $("#contentData").on("click", "#DeleteButton", function() {
                var Nip = $(this).attr("value");
                $.ajax({
                    url: 'service.php?action=delete',
                    type: 'post',
                    data: {
                        Nip: Nip
                    },
                    success: function(data) {
                        alert(data);
                        loadData();
                    }
                });
            });
        })

        function loadData() {
            $.ajax({
                url: 'data.php',
                type: 'get',
                success: function(data) {
                    $('#contentData').html(data);
                }
            });
        }
    </script>
</head>

<body>
    <div align="center">
        <h2>Simple Crud Ajax dan PHP</h2>
        <div id="contentData"></div>
    </div>
</body>

</html>