<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo base_url();?>test_line/line_post" method="post">
        <select name="to" id="to">
            <option value="U55ebca7c282122cff90fec9bb3062f5a">TOP</option>
            <option value="C67967832e840d14b65c569db22ac5aac">Avenger</option>
            <option value="C0c7ae74faab184fc0097f88f34a85306">Test</option>
            <option value="U55ebca7c282122cff90fec9bb3062f5a">regent</option>
            <option value="U55ebca7c282122cff90fec9bb3062f5a">sathaphon</option>
        </select>
        <select name="type" id="type">
            <option value="message">message</option>
            <option value="flex">flex</option>
            <option value="sticker">sticker</option>
            <option value="">none</option>
        </select>
        <input type="text" name="mm" id="mm">
        <input type="text" name="price" id="price">
        <input type="text" name="pay" id="pay">
        <input type="text" name="detail" id="detail">
        <input type="text" name="unit" id="unit">
        <button type="submit">Submit</button>
    </form>
    <a href="./test_line">post</a>
</body>
</html>