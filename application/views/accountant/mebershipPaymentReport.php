<style>
    h1 {
        color: navy;
        font-family: times;
        font-size: 24pt;
        text-decoration: underline;
    }

    p.first {
        color: #003300;
        font-family: helvetica;
        font-size: 12pt;
    }

    p.first span {
        color: #006600;
        font-style: italic;
    }

    p#second {
        color: rgb(00, 63, 127);
        font-family: times;
        font-size: 12pt;
        text-align: justify;
    }

    p#second>span {
        background-color: #FFFFAA;
    }

    table.first {
        color: #003300;
        font-family: helvetica;
        font-size: 8pt;
        border-left: 3px solid red;
        border-right: 3px solid #FF00FF;
        border-top: 3px solid green;
        border-bottom: 3px solid blue;
        background-color: #ccffcc;
    }

    td {
        border: 2px solid blue;
        background-color: #ffffee;
    }

    td.second {
        border: 2px dashed green;
    }

    div.test {
        color: #CC0000;
        background-color: #FFFF66;
        font-family: helvetica;
        font-size: 10pt;
        border-style: solid solid solid solid;
        border-width: 2px 2px 2px 2px;
        border-color: green #FF00FF blue red;
        text-align: center;
    }

    .lowercase {
        text-transform: lowercase;
    }

    .uppercase {
        text-transform: uppercase;
    }

    .capitalize {
        text-transform: capitalize;
    }
</style>

<h1 class="title">Example of <i style="color:#990000">XHTML + CSS</i></h1>

<p class="first">Example of paragraph with class selector. <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sed imperdiet lectus. Phasellus quis velit velit, non condimentum quam. Sed neque urna, ultrices ac volutpat vel, laoreet vitae augue. Sed vel velit erat. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Cras eget velit nulla, eu sagittis elit. Nunc ac arcu est, in lobortis tellus. Praesent condimentum rhoncus sodales. In hac habitasse platea dictumst. Proin porta eros pharetra enim tincidunt dignissim nec vel dolor. Cras sapien elit, ornare ac dignissim eu, ultricies ac eros. Maecenas augue magna, ultrices a congue in, mollis eu nulla. Nunc venenatis massa at est eleifend faucibus. Vivamus sed risus lectus, nec interdum nunc.</span></p>

<p id="second">Example of paragraph with ID selector. <span>Fusce et felis vitae diam lobortis sollicitudin. Aenean tincidunt accumsan nisi, id vehicula quam laoreet elementum. Phasellus egestas interdum erat, et viverra ipsum ultricies ac. Praesent sagittis augue at augue volutpat eleifend. Cras nec orci neque. Mauris bibendum posuere blandit. Donec feugiat mollis dui sit amet pellentesque. Sed a enim justo. Donec tincidunt, nisl eget elementum aliquam, odio ipsum ultrices quam, eu porttitor ligula urna at lorem. Donec varius, eros et convallis laoreet, ligula tellus consequat felis, ut ornare metus tellus sodales velit. Duis sed diam ante. Ut rutrum malesuada massa, vitae consectetur ipsum rhoncus sed. Suspendisse potenti. Pellentesque a congue massa.</span></p>

<div class="test">example of DIV with border and fill.
    <br />Lorem ipsum dolor sit amet, consectetur adipiscing elit.
    <br /><span class="lowercase">text-transform <b>LOWERCASE</b> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
    <br /><span class="uppercase">text-transform <b>uppercase</b> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
    <br /><span class="capitalize">text-transform <b>cAPITALIZE</b> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
</div>

<br />

<table class="first" cellpadding="4" cellspacing="6">
    <tr>
        <td width="30" align="center"><b>No.</b></td>
        <td width="140" align="center" bgcolor="#FFFF00"><b>XXXX</b></td>
        <td width="140" align="center"><b>XXXX</b></td>
        <td width="80" align="center"> <b>XXXX</b></td>
        <td width="80" align="center"><b>XXXX</b></td>
        <td width="45" align="center"><b>XXXX</b></td>
    </tr>
    <tr>
        <td width="30" align="center">1.</td>
        <td width="140" rowspan="6" class="second">XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX</td>
        <td width="140">XXXX<br />XXXX</td>
        <td width="80">XXXX<br />XXXX</td>
        <td width="80">XXXX</td>
        <td align="center" width="45">XXXX<br />XXXX</td>
    </tr>
    <tr>
        <td width="30" align="center" rowspan="3">2.</td>
        <td width="140" rowspan="3">XXXX<br />XXXX</td>
        <td width="80">XXXX<br />XXXX</td>
        <td width="80">XXXX<br />XXXX</td>
        <td align="center" width="45">XXXX<br />XXXX</td>
    </tr>
    <tr>
        <td width="80">XXXX<br />XXXX<br />XXXX<br />XXXX</td>
        <td width="80">XXXX<br />XXXX</td>
        <td align="center" width="45">XXXX<br />XXXX</td>
    </tr>
    <tr>
        <td width="80" rowspan="2">XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX</td>
        <td width="80">XXXX<br />XXXX</td>
        <td align="center" width="45">XXXX<br />XXXX</td>
    </tr>
    <tr>
        <td width="30" align="center">3.</td>
        <td width="140">XXXX<br />XXXX</td>
        <td width="80">XXXX<br />XXXX</td>
        <td align="center" width="45">XXXX<br />XXXX</td>
    </tr>
    <tr bgcolor="#FFFF80">
        <td width="30" align="center">4.</td>
        <td width="140" bgcolor="#00CC00" color="#FFFF00">XXXX<br />XXXX</td>
        <td width="80">XXXX<br />XXXX</td>
        <td width="80">XXXX<br />XXXX</td>
        <td align="center" width="45">XXXX<br />XXXX</td>
    </tr>
</table>