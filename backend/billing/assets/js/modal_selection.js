$(document).ready(function () {
    var selectedItems = []; // Array to store selected items
    var allSelectedItems = [];
    
    
    // When a "Select" button is clicked
    $(document).on("click", ".select-item-btn", function () {
        var itemCode = $(this).data("id");
        var itemDesc = $(this).data("desc");
        var itemCategory = $(this).data("category");
        var itemAmount = $(this).data("amount");
        var itemPrice = $(this).data("price");

        
        // Add selected item to the array
        selectedItems.push({ itemCode, itemCategory, itemDesc, itemPrice,itemAmount });
        // Create a new row for the selected item
        var newRow = `<tr>
                    <td>${selectedItems.length}</td>
                    <td>${itemCode}</td>
                    <td>${itemCategory}</td>
                    <td>${itemDesc}</td>
                    <td></td> 
                    <td></td>
                    <td>₱ ${itemPrice}.00</td>
                    <td></td>
                </tr>`;

        
        // Append the new row to the selected items section in the modal
        $("#selected-items-table").append(newRow);
    });
    
    // When the "Continue" button is clicked
    $("#continueButton").click(function () {
        // Loop through selectedItems array and append rows to the main table
        for (var i = 0; i < selectedItems.length; i++) {
            var tableRow = `<tr>
                                <td>${(i + 1)}</td>
                                <td>${selectedItems[i].itemCode}</td>
                                <td>${selectedItems[i].itemCategory}</td>
                                <td>${selectedItems[i].itemDesc}</td>
                                <td></td>
                                <td>₱ ${selectedItems[i].itemPrice}.00</td>
                                <td>₱ ${selectedItems[i].itemPrice}.00</td>
                                <td></td>
                            </tr>`;

                            
            $("#transactionsLineItems tbody").append(tableRow);
        }
        allSelectedItems = [...allSelectedItems, ...selectedItems];
        selectedItems = [];
        $("#selected-items-table tbody").empty();
        console.log("allselecteditems: ", allSelectedItems)
        $("#transactionsLineItems").data("selectedItems", allSelectedItems);
        // Close the modal
        $("#myModal").modal("hide");
    });

    $("#discardButton").click(function() {
        selectedItems = [];
        $("#selected-items-table tbody").empty();
    })
});
