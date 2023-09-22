document.addEventListener('DOMContentLoaded', function () {
    const stars = document.querySelectorAll('.rate input');
    const averageRating = document.getElementById('avgrat');
    const totalRatings = document.getElementById('totalrat');

    // Initialize ratings
    let userRating = 0;
    let totalRating = 0;
    let numRatings = 0;

    // Function to update the average rating
    function updateAverageRating() {
        const newAverage = (totalRating / numRatings).toFixed(1);
        averageRating.textContent = newAverage;
    }

    // Function to handle user rating input
    stars.forEach(function (star) {
        star.addEventListener('click', function () {
            userRating = parseInt(star.value);

            // Send the user rating to the server for storage
            fetch('save_rating.php', {
                method: 'POST',
                body: JSON.stringify({ rating: userRating }),
                headers: {
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    totalRating += userRating;
                    numRatings++;
                    // Update the average rating display
                    updateAverageRating();
                    totalRatings.textContent = numRatings;
                } else {
                    alert('Failed to save rating.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while saving the rating.');
            });
        });
    });

    // Initial average rating display
    updateAverageRating();
    totalRatings.textContent = numRatings;
});
