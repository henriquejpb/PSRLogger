<?php
namespace Psr\Log;

abstract class AbstractLogger implements LoggerInterface {

    /**
     * Outputs the log message to somewhere.
     * 
     * @return void
     */
    abstract protected function outputLog($message);

    /**
     * Puts a message of log, prefixing the interpolated message with `$message`.
     *
     * @param string $prefix The prefix of the log message.
     * @param string $message A parametrized message.
     * @param array<mixed> $context The parameters of the message;
     *
     * @return void
     */
    private function putMessage($prefix, $message, array $context = array()) {
        $this->outputLog($prefix . $this->interpolate($message, $context));
    }

    /**
     * Interpolates a message with a context.
     *
     * Ex.:
     * <code>
     *  "User {0} logged in" + array('John Doe') = "User John Doe logged in"
     *  "User {username} logged in" + array('username => John Doe') = "User John Doe logged in"
     * </code>
     *
     * @param string $message A parametrized message.
     * @param array<mixed> $context The messagem parameters.
     *
     * @return string
     */
    private function interpolate($message, array $context = array()) {
        $replace = array();
        foreach ($context as $key => $val) {
            $replace['{' . $key . '}'] = $val;
        }

        // interpolate replacement values into the message and return
        return strtr($message, $replace);
    }

    /**
     * {@inherit-doc}
     */
    public function emergency($message, array $context= array()) {
        $this->putMessage("Emergency: ", $message, $context);
    } 

    /**
     * {@inherit-doc}
     */
    public function alert($message, array $context= array()) {
        $this->putMessage("Alert: ", $message, $context);
    } 

    /**
     * {@inherit-doc}
     */
    public function critical($message, array $context= array()) {
        $this->putMessage("Critical: ", $message, $context);
    } 

    /**
     * {@inherit-doc}
     */
    public function error($message, array $context= array()) {
        $this->putMessage("Error: ", $message, $context);
    } 

    /**
     * {@inherit-doc}
     */
    public function warning($message, array $context= array()) {
        $this->putMessage("Warning: ", $message, $context);
    } 

    /**
     * {@inherit-doc}
     */
    public function notice($message, array $context= array()) {
        $this->putMessage("Notice: ", $message, $context);
    } 

    /**
     * {@inherit-doc}
     */
    public function info($message, array $context= array()) {
        $this->putMessage("Info: ", $message, $context);
    } 

    /**
     * {@inherit-doc}
     */
    public function debug($message, array $context= array()) {
        $this->putMessage("Debug: ", $message, $context);
    } 

    /**
     * {@inherit-doc}
     *
     * If '$level` is not a valid `LogLevel` value, the log will be of type INFO.
     */
    public function log($level, $message, array $context= array()) {
        switch ($level) {
        case LogLevel::EMERGENCY:
            $this->emergency($message, $context);
            break;
        case LogLevel::ALERT:
            $this->alert($message, $context);
            break;
        case LogLevel::CRITICAL:
            $this->critical($message, $context);
            break;
        case LogLevel::ERROR:
            $this->error($message, $context);
            break;
        case LogLevel::WARNING:
            $this->warning($message, $context);
            break;
        case LogLevel::NOTICE:
            $this->notice($message, $context);
            break;
        case LogLevel::INFO:
        default:
            $this->info($message, $context);
            break;
        case LogLevel::DEBUG:
            $this->debug($message, $context);
            break;
        }
    } 

}
