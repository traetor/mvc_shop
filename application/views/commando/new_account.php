<h1> Nowe konto</h1>
    <div id="zawartosc">
    <form action="<?php echo site_url('commando/create')?>" method="POST">
        <div align="center">
        <table border="0" cellpadding="2px">
                        <tr>
                            <th>login: </th>
                            <td><input type="text" name='login'></td>
                        </tr>
                        <tr>
                            <th>Hasło: </td>
                            <td><input type="password" name='password'>  </td>
                        </tr>
                        <tr>
                            <th>Imie: </td>
                            <td><input type="text" name='name'>  </td>
                        </tr>
                        <tr>
                            <th>Nazwisko: </td>
                            <td><input type="text" name='surname'>  </td>
                        </tr>
                        <tr>
                            <th>Kod: </td>
                            <td><input type="text" name='code'>  </td>
                        </tr>
                        <tr>
                            <th>Poczta: </td>
                            <td><input type="text" name='mail'>  </td>
                        </tr>
                        <tr>
                            <th>Adres: </td>
                            <td><input type="text" name='address'>  </td>
                        </tr>
                        <tr>
                            <th>Email: </td>
                            <td><input type="text" name='email'>  </td>
                        </tr>
                    </table>
                    <input class="fg-button teal" type="button" value="cofnij" onclick="back_to_main()" />
                    <input class ='fg-button teal' type="submit" value="Utwórz konto"></div>
		</form>
	</div>