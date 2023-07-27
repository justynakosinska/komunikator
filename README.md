# KOMUNIKATOR   

Aplikacja "Komunikator" jest platformą do komunikacji między użytkownikami, umożliwiającą wysyłanie wiadomości tekstowych oraz przeglądanie wcześniejszych wiadomości. Dane użytkowników są przechowywane w bazie danych MySQL, a komunikacja z bazą danych odbywa się za pomocą języka PHP. Aplikacja została stworzona przy użyciu technologii webowych, takich jak JavaScript, HTML, CSS, jQuery, AJAX, MySQL i PHP, a do jej uruchomienia lokalnie wykorzystano platformę XAMPP.

## Wymagania funkcjonalne

- Możliwość komunikowania się między użytkownikami poprzez wysyłanie wiadomości tekstowych.
- Moduł rejestracji nowego użytkownika, umożliwiający podanie imienia, nazwiska, adresu e-mail, hasła oraz wybranie zdjęcia profilowego.
- Przekierowanie użytkownika do obszaru użytkowników po pomyślnej rejestracji, aby dokonać wyboru, z kim rozpocząć czat (wymaga co najmniej dwóch zarejestrowanych użytkowników).
- Ograniczenie długości wiadomości do maksymalnie 1000 znaków.
- Możliwość łatwego wylogowania się z aplikacji za pomocą dedykowanego przycisku, po czym pojawi się panel logowania.
- Każdy użytkownik ma status dostępności - aktywny, gdy użytkownik jest zalogowany, lub nieaktywny, gdy jest wylogowany.
- Po zalogowaniu użytkownik może widzieć, kto jest zalogowany i czy w ogóle ktoś jest aktualnie zalogowany.
- Prosty interfejs użytkownika, który wyświetla komunikaty podczas rejestracji w przypadku niewypełnienia wymaganych pól oraz informuje o poprawnych rozszerzeniach zdjęć dla zdjęcia profilowego.

## Wymagania niefunkcjonalne

- Aplikacja powinna być łatwa w użyciu i intuicyjna dla użytkowników.
- Szybka responsywność nawet przy dużej liczbie użytkowników lub długich konwersacjach.
- Skalowalność aplikacji, aby była przygotowana na ewentualne rozbudowanie w przyszłości.
- Zapewnienie niezawodności aplikacji, aby spełniała oczekiwania użytkowników.


## Instrukcje dotyczące uruchomienia aplikacji:

1. Skonfiguruj środowisko serwerowe za pomocą XAMPP lub podobnego narzędzia.
2. Zaimportuj plik SQL zawierający schemat bazy danych i początkowe dane.
3. Uruchom aplikację na lokalnym serwerze.

## Podsumowanie

Aplikacja "Komunikator" spełnia wszystkie wymagania funkcjonalne i niefunkcjonalne określone w specyfikacji początkowej. Dzięki swojej prostocie i intuicyjności, umożliwia użytkownikom swobodną komunikację w czasie rzeczywistym. Jest łatwa w użyciu, szybka i skalowalna, co zapewnia niezawodne doświadczenie dla użytkowników. Aplikacja została zaimplementowana przy użyciu najnowocześniejszych technologii webowych, gwarantując nowoczesny interfejs i efektywność działania. Projekt jest dostępny na GitHubie pod adresem https://github.com/justynakosinska/komunikator.git


## Autor

Justyna Kosińska
