<?php

class Request
{
    /**
     * Get the request method.
     *
     * @return string as the request method
     */
    public function getMethod()
    {
        return $_SERVER["REQUEST_METHOD"];
    }



    /**
     * Get the current url.
     *
     * @param boolean $queryString attach query string, default is true.
     *
     * @return string as current url.
     */
    public function getCurrentUrl($queryString = true)
    {
        $port  = $_SERVER["SERVER_PORT"];
        $https = ($_SERVER["HTTPS"] ?? null) == "on" ? true : false;

        $scheme = $https
            ? "https"
            : $_SERVER["REQUEST_SCHEME"] ?? "http";

        $server = $_SERVER["SERVER_NAME"]
            ?: $_SERVER["HTTP_HOST"];

        $port  = ($port === "80")
            ? ""
            : (($port == 443 && $https)
                ? ""
                : ":" . $port);

        $uri = rawurldecode($_SERVER["REQUEST_URI"]);
        $uri = $queryString
            ? rtrim($uri, "/")
            : rtrim(strtok($uri, "?"), "/");

        $url  = htmlspecialchars($scheme) . "://";
        $url .= htmlspecialchars($server)
            . $port . htmlspecialchars(rawurldecode($uri));

        return $url;
    }
}
