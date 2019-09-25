/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//module.exports = function(count){
//  return "My First Javascript with webpack" + '@'.repeat(count);  
//};
export default function () {
        
    $( document ).ready(function() {
        $('.list-table').DataTable(
                {
                    "language" : {
                        "url" : "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
                    }
                }        
        );
    });

};


