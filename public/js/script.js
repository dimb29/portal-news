
// like-comment | post.blade.php
$(document).ready(function(){
    $('#comment_like').on('click',function(){
        $('#comment_like').removeClass('fa-regular');
        $('#comment_like').addClass('fa-solid');
        
    });
});
//Comments | post.blade.php
// $(document).ready(function(){
//     // Fetch all records
//     $('#fetchAllRecord').click(function(){
//         fetchRecords(0);
//     });
//     // Search by userid
//     $('#btnSearch').click(function(){
//         var userid = Number($('#search').val().trim());
//         if(userid > 0){
//             fetchRecords(userid);
//         }
//     });
// });
// function fetchRecords(id){
//     $.ajax({
//     url: 'getData/'+id,
//     type: 'get',
//     dataType: 'json',
//     success: function(response){
//         var len = 0;
//         $('#userTable tbody').empty(); // Empty <tbody>
//         if(response['data'] != null){
//         len = response['data'].length;
//     }
//         if(len > 0){
//             for(var i=0; i<len; i++){
//                 var id = response['data'][i].id;
//                 var username = response['data'][i].comment;
//                 var tr_str = "<tr>" +
//                 "<td align='center'>" + (i+1) + "</td>" +
//                 "<td align='center'>" + comment + "</td>" +
//                 "</tr>";
//                 $("#userTable tbody").append(tr_str);
//             }
//         }else if(response['data'] != null){
//             var tr_str = "<tr>" +
//             "<td align='center'>1</td>" +
//             "<td align='center'>" + response['data'].comment + "</td>" + 
//             "</tr>";
//             $("#userTable tbody").append(tr_str);
//         }else{
//         var tr_str = "<tr>" +
//         "<td align='center' colspan='4'>No record found.</td>" +
//         "</tr>";
//         $("#userTable tbody").append(tr_str);
//         }
//     }
//     });
// }