<style>
   .loader {
        position:absolute;
        border: 15px solid #f3f3f3; /* Light grey */
        border-top: 16px solid #3498db; /* Blue */
        border-radius: 50%;
        width: 120px;
        height: 120px;
        animation: spin 2s linear infinite;
        top:50%;
        left: 50%;
        display: none;
     }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

</style>

 <div id="loader" class="loader"></div>
 
<script>
    function showLoader(event, btn) {
        document.getElementById('loader').style.display = 'block'
        disableBtn(btn);
    } 

    function disableBtn(btn) {
        btn.disabled = true;
    }

</script>