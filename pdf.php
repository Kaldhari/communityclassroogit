<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
</head>

<body>
    <h3>Using html2pdf to create a PDF using the content of the form</h3>
    <form id="form">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name"><br><br>

        <label for="comment">Comment:</label>
        <input type="text" id="comment" name="comment"><br><br>

        <input type="button" value="Generate PDF" onclick="getContentInPDF()">
    </form>

    <script>
        function getContentInPDF() {
            let name = document.getElementById('name').value;
            let comment = document.getElementById('comment').value;

            // Create a container div with centered styles and a curved border
            let element = document.createElement('div');
            element.style.textAlign = "center";
            element.style.margin = "50px auto";
            element.style.border = "2px solid #000";
            element.style.borderRadius = "15px"; // Curved edges
            element.style.padding = "20px"; // Space inside the border
            element.style.width = "60%"; // Set a specific width
            element.style.boxSizing = "border-box"; // Include padding in width calculation

            element.innerHTML = `
                <h1>Form Data</h1>
                <p>Name: ${name}</p>
                <p>Comment: ${comment}</p>
            `;

            // Generate the PDF
            html2pdf().from(element).save();
        }
    </script>
</body>

</html>
