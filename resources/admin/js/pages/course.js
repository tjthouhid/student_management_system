
var table;
 
$(document).ready(function() {
    //datatables
    // datatable Intialization
    (function (){
            dataTableObj = $('#course_table').DataTable({ 
        
                "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
                "order": [], //Initial no order.
                "lengthMenu": [ [1, 5, 10, 25, 50, -1], [1, 5, 10, 25, 50, "All"] ],
                "pageLength": 25,
                "pagingType": "full_numbers",
                "filter": false,
                "destroy": true,
                "orderMulti": true,
                // dom: 'Bfrtip',
                // buttons: [
                //     {extend: 'copy',exportOptions: {columns: ':visible'}},
                //     {extend: 'csv',exportOptions: {columns: ':visible'}},
                //     {extend: 'excel',exportOptions: {columns: ':visible'}},
                //     {extend: 'pdf',exportOptions: {columns: ':visible'}},
                //     {extend: 'print',exportOptions: {columns: ':visible'}}
                //     //,
                //    // 'colvis'
                // ],
                
            
                // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": site_url+"scadmin/course/index",
                    "type": "POST",
                    "data": function ( postData ) { 
                        
                        // delete postData.columns;  // delete column defination information if not needed

                        /* Add Addition search param */
                       postData.advance_searches ={};
                       // postData.advance_searches.extra_search1 = "ljl";
                       //postData.advance_searches.student_name = $('#student_name').val();
                       //postData.advance_searches.student_gender = $('#student_gender').val();
                       // postData.advance_searches.student_name = $('#student_name').val();
                        
                    }
                },

            
                //Set column definition initialisation properties.
                "columnDefs": [
                    {  "targets": [ 0 ], "orderable": false, "name": "serial", "className": "column-serial", "visible": true },
                    {  "targets": [ 1 ], "orderable": true,  "name": "title", "className": "column-title", "visible": true },
                     {  "targets": [ 2 ], "orderable": true,  "name": "price", "className": "column-price", "visible": true },
                    {  "targets": [ 3 ], "orderable": false, "name": "action", "className": "column-action", "visible": true }
                ],

                // Initialisation complete callback.
                "initComplete": function (settings, json){

                },

                // Row draw callback
                "rowCallback": function (row, data, index){

                },
                
                // Function that is called every time DataTables performs a draw.
                "drawCallback": function (settings ){
                     
                },
            
            });  
        })();

        
       
       
        
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {                 
                   $('#student-profile-img').attr('src',e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#student_photo").change(function(){
            readURL(this);
        });

        
        var form=$("#student-form");
        form.validate({
            rules: {
               student_name: {
                 required: true
               },
               student_email: {
                     required: true,
                     email: true
                }
           },
           messages: {
                   student_name: "Enter your firstname",
                   student_email: {
                       required: "Enter a username",
                       email: "check"
                   }
            },
          submitHandler: function(form) {
            // some other code
            // maybe disabling submit button
            // then:
            form.submit();
          }
         });

});

