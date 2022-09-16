<form method="post" action="/" name="update_game">
    <label>EDIT GAME</label>
    <div>
        <div><div>Publisher:</div><div><input type="text" name="publisher" value="<?php echo (isset($game['publisher'])) ? $game['publisher'] : ''; ?>"/></div></div>
        <div><div>Name:</div><div><input type="text" name="name" value="<?php echo (isset($game['name'])) ? $game['name'] : ''; ?>"/></div></div>
        <div><div>Nickname:</div><div><input type="text" name="nickname" value="<?php echo (isset($game['nickname'])) ? $game['nickname'] : ''; ?>"/></div></div>
        <div><div>Rating:</div><div><input type="text" name="rating" value="<?php echo (isset($game['rating'])) ? $game['rating'] : ''; ?>"/></div></div>
        <div><input type="submit" name="submit" value="Update Game" /></div>
    </div>
</form>