<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>home</h1>
</body>
<script>
    const getUser = async () => {
        try {

            const data = await fetch("/")
            const response = await  data.json()
        } catch (Err) {
            console.log(Err.message);
            
        }
    }
</script>

</html>