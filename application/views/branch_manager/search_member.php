<?php
include "inc/header_links.php";
include "inc/left_sidebar.php";
include "inc/top_bar.php";
include "inc/member_search_content.php";
include "inc/footer.php";
?>
<script>
    // Get the select element
    const linkSelect = document.getElementById("single-select-field");

    // Add an event listener to the select element
    linkSelect.addEventListener("change", function () {
        // Get the selected option's value
        const selectedValue = linkSelect.value;

        // Check if a link has been selected (value is not empty)
        if (selectedValue) {
            // Navigate to the selected link
            window.location.href = selectedValue;
        }
    });
</script>

