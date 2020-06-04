$('#printInvoice').click(function(){

    $("#printBtn").addClass("invisible");
    Popup($('#invoice')[0].innerHTML);
    function Popup(data) 
    {
        window.print();
        return true;
    }
    $("#printBtn").removeClass("invisible");
});