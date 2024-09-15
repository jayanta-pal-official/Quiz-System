
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

        <script>
            var sec = 15;
            var time = setInterval(myTimer, 1000);

            function myTimer() {
                document.getElementById('timer').innerHTML = sec + " sec ";
                sec--;
                if (sec == -1) {
                    clearInterval(time);
                    moveToNextQuestion();
                }
            }
            function  moveToNextQuestion(){
                document.getElementById('quizForm').submit();

            }
            // window.onload = startTimer;
        </script>
</body>

</html>