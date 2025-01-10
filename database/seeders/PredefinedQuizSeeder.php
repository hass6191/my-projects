<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PredefinedQuizSeeder extends Seeder
{
    public function run()
    {
        $quizzes = [
            [
                'title' => 'Football Quiz',
                'category' => 'Football',
                'questions' => json_encode([
                    ['question' => 'Who is the only player to have won the Ballon d\'Or six times?', 'answer' => 'Lionel Messi'],
                    ['question' => 'Which country has won the most FIFA World Cups?', 'answer' => 'Brazil (5 times)'],
                    ['question' => 'Which club has won the most UEFA Champions League titles?', 'answer' => 'Real Madrid (14 titles as of 2023)'],
                    ['question' => 'Who scored the fastest hat-trick in Premier League history?', 'answer' => 'Sadio Mané (2 minutes 56 seconds)'],
                    ['question' => 'Which country hosted the first FIFA World Cup in 1930?', 'answer' => 'Uruguay'],
                    ['question' => 'Who holds the record for the most goals in a single World Cup tournament?', 'answer' => 'Just Fontaine (13 goals, 1958)'],
                    ['question' => 'Which African country was the first to reach the FIFA World Cup quarter-finals?', 'answer' => 'Cameroon (1990)'],
                    ['question' => 'Who scored the “Hand of God” goal in the 1986 FIFA World Cup?', 'answer' => 'Diego Maradona'],
                    ['question' => 'Which player holds the record for the most goals in international football?', 'answer' => 'Cristiano Ronaldo'],
                    ['question' => 'Which English club is nicknamed “The Toffees”?', 'answer' => 'Everton'],
                ]),
                'type' => 'predefined',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Animals Quiz',
                'category' => 'Animals',
                'questions' => json_encode([
                    ['question' => 'Which animal has the largest brain relative to its body size?', 'answer' => 'Ant'],
                    ['question' => 'What is the only mammal capable of true flight?', 'answer' => 'Bat'],
                    ['question' => 'What is the world\'s largest amphibian?', 'answer' => 'Chinese Giant Salamander'],
                    ['question' => 'Which bird has the longest migration of any species?', 'answer' => 'Arctic Tern'],
                    ['question' => 'What is the fastest land animal?', 'answer' => 'Cheetah (70-75 mph)'],
                    ['question' => 'Which marine animal produces the loudest sound?', 'answer' => 'Sperm Whale'],
                    ['question' => 'What is the only poisonous mammal?', 'answer' => 'Platypus (male spurs are venomous)'],
                    ['question' => 'What animal can survive in space?', 'answer' => 'Tardigrade (Water Bear)'],
                    ['question' => 'What is the collective term for a group of crows?', 'answer' => 'Murder'],
                    ['question' => 'Which animal\'s fingerprints are almost indistinguishable from humans\'?', 'answer' => 'Koala'],
                ]),
                'type' => 'predefined',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Games Quiz',
                'category' => 'Games',
                'questions' => json_encode([
                    ['question' => 'Which game holds the record for the best-selling video game of all time?', 'answer' => 'Minecraft'],
                    ['question' => 'What is the highest rank in chess?', 'answer' => 'Grandmaster'],
                    ['question' => 'Which popular battle royale game features a shrinking "storm"?', 'answer' => 'Fortnite'],
                    ['question' => 'What was the first video game console ever released?', 'answer' => 'Magnavox Odyssey (1972)'],
                    ['question' => 'In which game would you find the “Plasma Cutter” weapon?', 'answer' => 'Dead Space'],
                    ['question' => 'What color is the ghost Clyde in Pac-Man?', 'answer' => 'Orange'],
                    ['question' => 'Which game features a city called Rapture?', 'answer' => 'BioShock'],
                    ['question' => 'Who is the protagonist of The Legend of Zelda series?', 'answer' => 'Link'],
                    ['question' => 'What is the name of the main character in the Halo series?', 'answer' => 'Master Chief (John-117)'],
                    ['question' => 'Which game popularized the phrase “Finish Him!”?', 'answer' => 'Mortal Kombat'],
                ]),
                'type' => 'predefined',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Music Quiz',
                'category' => 'Music',
                'questions' => json_encode([
                    ['question' => 'Which band released the album Dark Side of the Moon?', 'answer' => 'Pink Floyd'],
                    ['question' => 'Who is known as the “Queen of Pop”?', 'answer' => 'Madonna'],
                    ['question' => 'What was Elvis Presley’s first hit single?', 'answer' => '"Heartbreak Hotel"'],
                    ['question' => 'Which classical composer became deaf later in life but continued to compose?', 'answer' => 'Ludwig van Beethoven'],
                    ['question' => 'Which rapper holds the record for the most words in a hit single?', 'answer' => 'Eminem (in "Rap God")'],
                    ['question' => 'Who wrote the song “Hallelujah”?', 'answer' => 'Leonard Cohen'],
                    ['question' => 'Which band’s drummer was nicknamed “Bonzo”?', 'answer' => 'John Bonham (Led Zeppelin)'],
                    ['question' => 'Who is the lead singer of the rock band U2?', 'answer' => 'Bono'],
                    ['question' => 'What instrument does Yo-Yo Ma play?', 'answer' => 'Cello'],
                    ['question' => 'Which artist has won the most Grammy Awards?', 'answer' => 'Beyoncé (32 awards as of 2023)'],
                ]),
                'type' => 'predefined',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'History Quiz',
                'category' => 'History',
                'questions' => json_encode([
                    ['question' => 'What year did the Titanic sink?', 'answer' => '1912'],
                    ['question' => 'Who was the first president of the United States?', 'answer' => 'George Washington'],
                    ['question' => 'Which empire was ruled by Genghis Khan?', 'answer' => 'Mongol Empire'],
                    ['question' => 'What year did World War II end?', 'answer' => '1945'],
                    ['question' => 'Which ancient civilization built Machu Picchu?', 'answer' => 'Inca'],
                    ['question' => 'What was the name of the ship that brought the Pilgrims to America in 1620?', 'answer' => 'Mayflower'],
                    ['question' => 'Who was the longest-reigning monarch in British history?', 'answer' => 'Queen Elizabeth II'],
                    ['question' => 'Which explorer is credited with discovering America in 1492?', 'answer' => 'Christopher Columbus'],
                    ['question' => 'What war was fought between the North and South regions of the United States?', 'answer' => 'American Civil War'],
                    ['question' => 'What was the name of the treaty that ended World War I?', 'answer' => 'Treaty of Versailles'],
                ]),
                'type' => 'predefined',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Insert predefined quizzes into the database
        DB::table('quizzes')->insert($quizzes);
    }
}