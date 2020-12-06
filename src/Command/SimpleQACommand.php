<?php declare(strict_types=1);

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ChoiceQuestion;

class SimpleQACommand extends Command
{
    protected static $defaultName = "app:question-answer";

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $helper = $this->getHelper('question');

        $question = new ChoiceQuestion('YES or NO?', ['yes', 'no']);
//        $question->setValidator(function ($answer) {
//            if (!in_array($answer, ['yes'])) {
//                throw new \RuntimeException(
//                    'Nee, oder?! YES o NO, no es tan dificil imbecil!'
//                );
//            }
//            return $answer;
//        });

        $answer = $helper->ask($input, $output, $question);

        $output->writeln('Your answer: ' . $answer);

//        $question = new ChoiceQuestion('TRUE or FALSE?', ['true', 'false']);
//
//        $answer = $helper->ask($input, $output, $question);
//
//        $output->writeln('Your answer: ' . $answer);

        return 0;
    }
}