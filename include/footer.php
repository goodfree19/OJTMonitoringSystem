


  
  <script src="../assets/bundles/lib.vendor.bundle.js"></script>

  <script src="../assets/plugins/dropify/js/dropify.min.js"></script>

  <script src="../assets/js/core.js"></script>
  <script src="../assets/js/form/dropify.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
  flatpickr("time", {});
</script>  
<script>  function selectCurrentDate() {
            var dateInput = document.getElementById("dateInput");
            var today = new Date();
            var year = today.getFullYear();
            var month = (today.getMonth() + 1).toString().padStart(2, '0'); // Ensure two digits for month
            var day = today.getDate().toString().padStart(2, '0'); // Ensure two digits for day
            var currentDate = year + '-' + month + '-' + day;
            dateInput.value = currentDate;
        }

        // Call the selectCurrentDate function to set the input to the current date
        selectCurrentDate();
        
        
        </script>
</body>

</html>

