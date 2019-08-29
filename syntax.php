<?php
/**
 * Ciphertext-Support Plugin
 *
 * @license    GPL 3 (http://www.gnu.org/licenses/gpl.html)
 * @author     Georg Schmidt
 */

// https://www.dokuwiki.org/devel:syntax_plugins
class syntax_plugin_ciphertextsupport extends DokuWiki_Syntax_Plugin
{
    
    // Kind of syntax
    function getType()
    {
        return 'substition';
    }
    
    // Paragraph type
    function getPType()
    {
        return 'block';
    }
    
    // sorting order
    function getSort()
    {
        return 2;
    }
    
    // SHA3-Pattern
    function connectTo($mode)
    {
        $this->Lexer->addSpecialPattern('-----CIPHERTEXT-GS-----[^-]+-----END-CIPHERTEXT-GS-----', $mode, 'plugin_ciphertextsupport');
    }
    
    // Trim Match
    function handle($match, $state, $pos, Doku_Handler $handler)
    {
        return $match;
    }
    
    // Render output
    public function render($mode, Doku_Renderer $renderer, $data)
    {
        
        if ($mode == 'xhtml')
        {
            $renderer->doc .= '<pre id="ciphertext">' . trim(substr($data,23,strlen($data) - 50)) . '</pre>';
            return true;
        }
        return false;
    }
}

//Setup VIM: ex: et ts=4 enc=utf-8 :