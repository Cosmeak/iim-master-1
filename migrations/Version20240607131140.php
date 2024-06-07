<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240607131140 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // Custom
        $this->addSql('CREATE EXTENSION postgis');

        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE acces_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE api_token_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE calendar_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE event_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE event_tags_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE file_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE invitation_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE tag_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE todo_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE token_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE "user_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE acces (id INT NOT NULL, role TEXT NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN acces.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN acces.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE api_token (id INT NOT NULL, user_token_id INT DEFAULT NULL, token VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_7BA2F5EBA15303B9 ON api_token (user_token_id)');
        $this->addSql('CREATE TABLE calendar (id INT NOT NULL, user_id_id INT NOT NULL, slug VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, description TEXT DEFAULT NULL, color VARCHAR(7) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_6EA9A1469D86650F ON calendar (user_id_id)');
        $this->addSql('COMMENT ON COLUMN calendar.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN calendar.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE event (id INT NOT NULL, slug VARCHAR(255) NOT NULL, title VARCHAR(255) DEFAULT NULL, description TEXT DEFAULT NULL, url VARCHAR(255) DEFAULT NULL, start_date DATE DEFAULT NULL, start_time TIME(0) WITHOUT TIME ZONE DEFAULT NULL, end_date DATE DEFAULT NULL, end_time TIME(0) WITHOUT TIME ZONE DEFAULT NULL, is_full_day BOOLEAN NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, localisation Geography(Point) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN event.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN event.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN event.localisation IS \'(DC2Type:point)\'');
        $this->addSql('CREATE TABLE event_event (event_source INT NOT NULL, event_target INT NOT NULL, PRIMARY KEY(event_source, event_target))');
        $this->addSql('CREATE INDEX IDX_7AB5BB8B6D130821 ON event_event (event_source)');
        $this->addSql('CREATE INDEX IDX_7AB5BB8B74F658AE ON event_event (event_target)');
        $this->addSql('CREATE TABLE event_calendar (event_id INT NOT NULL, calendar_id INT NOT NULL, PRIMARY KEY(event_id, calendar_id))');
        $this->addSql('CREATE INDEX IDX_2845489671F7E88B ON event_calendar (event_id)');
        $this->addSql('CREATE INDEX IDX_28454896A40A2C8 ON event_calendar (calendar_id)');
        $this->addSql('CREATE TABLE event_tags (id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE event_tags_event (event_tags_id INT NOT NULL, event_id INT NOT NULL, PRIMARY KEY(event_tags_id, event_id))');
        $this->addSql('CREATE INDEX IDX_82425D082CE61B ON event_tags_event (event_tags_id)');
        $this->addSql('CREATE INDEX IDX_82425D071F7E88B ON event_tags_event (event_id)');
        $this->addSql('CREATE TABLE event_tags_tag (event_tags_id INT NOT NULL, tag_id INT NOT NULL, PRIMARY KEY(event_tags_id, tag_id))');
        $this->addSql('CREATE INDEX IDX_E2303A1A82CE61B ON event_tags_tag (event_tags_id)');
        $this->addSql('CREATE INDEX IDX_E2303A1ABAD26311 ON event_tags_tag (tag_id)');
        $this->addSql('CREATE TABLE file (id INT NOT NULL, event_id_id INT DEFAULT NULL, slug VARCHAR(255) NOT NULL, url_s3 VARCHAR(255) NOT NULL, mime_type VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_8C9F36103E5F2F7B ON file (event_id_id)');
        $this->addSql('COMMENT ON COLUMN file.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN file.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE invitation (id INT NOT NULL, user_id_id INT NOT NULL, calendar_id_id INT NOT NULL, event_id_id INT DEFAULT NULL, slug VARCHAR(255) NOT NULL, email VARCHAR(255) DEFAULT NULL, role TEXT NOT NULL, invited_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_F11D61A29D86650F ON invitation (user_id_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F11D61A213109D39 ON invitation (calendar_id_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F11D61A23E5F2F7B ON invitation (event_id_id)');
        $this->addSql('COMMENT ON COLUMN invitation.invited_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE tag (id INT NOT NULL, user_id_id INT DEFAULT NULL, slug VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, color VARCHAR(7) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_389B7839D86650F ON tag (user_id_id)');
        $this->addSql('COMMENT ON COLUMN tag.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN tag.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE tag_calendar (tag_id INT NOT NULL, calendar_id INT NOT NULL, PRIMARY KEY(tag_id, calendar_id))');
        $this->addSql('CREATE INDEX IDX_5898DA9DBAD26311 ON tag_calendar (tag_id)');
        $this->addSql('CREATE INDEX IDX_5898DA9DA40A2C8 ON tag_calendar (calendar_id)');
        $this->addSql('CREATE TABLE todo (id INT NOT NULL, user_id_id INT NOT NULL, event_id_id INT DEFAULT NULL, slug VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, content TEXT DEFAULT NULL, priority VARCHAR(255) NOT NULL, is_done BOOLEAN NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_5A0EB6A09D86650F ON todo (user_id_id)');
        $this->addSql('CREATE INDEX IDX_5A0EB6A03E5F2F7B ON todo (event_id_id)');
        $this->addSql('COMMENT ON COLUMN todo.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN todo.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE todo_todo (todo_source INT NOT NULL, todo_target INT NOT NULL, PRIMARY KEY(todo_source, todo_target))');
        $this->addSql('CREATE INDEX IDX_5DFD0BF3601EA51 ON todo_todo (todo_source)');
        $this->addSql('CREATE INDEX IDX_5DFD0BF2FE4BADE ON todo_todo (todo_target)');
        $this->addSql('CREATE TABLE todo_file (todo_id INT NOT NULL, file_id INT NOT NULL, PRIMARY KEY(todo_id, file_id))');
        $this->addSql('CREATE INDEX IDX_D34E500FEA1EBC33 ON todo_file (todo_id)');
        $this->addSql('CREATE INDEX IDX_D34E500F93CB796C ON todo_file (file_id)');
        $this->addSql('CREATE TABLE token (id INT NOT NULL, user_id_id INT NOT NULL, slug VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5F37A13B9D86650F ON token (user_id_id)');
        $this->addSql('CREATE TABLE "user" (id INT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, birthdate TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, avatar VARCHAR(255) DEFAULT NULL, color VARCHAR(255) DEFAULT NULL, is_verified BOOLEAN NOT NULL, cgv TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL ON "user" (email)');
        $this->addSql('ALTER TABLE api_token ADD CONSTRAINT FK_7BA2F5EBA15303B9 FOREIGN KEY (user_token_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE calendar ADD CONSTRAINT FK_6EA9A1469D86650F FOREIGN KEY (user_id_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE event_event ADD CONSTRAINT FK_7AB5BB8B6D130821 FOREIGN KEY (event_source) REFERENCES event (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE event_event ADD CONSTRAINT FK_7AB5BB8B74F658AE FOREIGN KEY (event_target) REFERENCES event (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE event_calendar ADD CONSTRAINT FK_2845489671F7E88B FOREIGN KEY (event_id) REFERENCES event (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE event_calendar ADD CONSTRAINT FK_28454896A40A2C8 FOREIGN KEY (calendar_id) REFERENCES calendar (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE event_tags_event ADD CONSTRAINT FK_82425D082CE61B FOREIGN KEY (event_tags_id) REFERENCES event_tags (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE event_tags_event ADD CONSTRAINT FK_82425D071F7E88B FOREIGN KEY (event_id) REFERENCES event (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE event_tags_tag ADD CONSTRAINT FK_E2303A1A82CE61B FOREIGN KEY (event_tags_id) REFERENCES event_tags (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE event_tags_tag ADD CONSTRAINT FK_E2303A1ABAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE file ADD CONSTRAINT FK_8C9F36103E5F2F7B FOREIGN KEY (event_id_id) REFERENCES event (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE invitation ADD CONSTRAINT FK_F11D61A29D86650F FOREIGN KEY (user_id_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE invitation ADD CONSTRAINT FK_F11D61A213109D39 FOREIGN KEY (calendar_id_id) REFERENCES calendar (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE invitation ADD CONSTRAINT FK_F11D61A23E5F2F7B FOREIGN KEY (event_id_id) REFERENCES event (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE tag ADD CONSTRAINT FK_389B7839D86650F FOREIGN KEY (user_id_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE tag_calendar ADD CONSTRAINT FK_5898DA9DBAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE tag_calendar ADD CONSTRAINT FK_5898DA9DA40A2C8 FOREIGN KEY (calendar_id) REFERENCES calendar (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE todo ADD CONSTRAINT FK_5A0EB6A09D86650F FOREIGN KEY (user_id_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE todo ADD CONSTRAINT FK_5A0EB6A03E5F2F7B FOREIGN KEY (event_id_id) REFERENCES event (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE todo_todo ADD CONSTRAINT FK_5DFD0BF3601EA51 FOREIGN KEY (todo_source) REFERENCES todo (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE todo_todo ADD CONSTRAINT FK_5DFD0BF2FE4BADE FOREIGN KEY (todo_target) REFERENCES todo (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE todo_file ADD CONSTRAINT FK_D34E500FEA1EBC33 FOREIGN KEY (todo_id) REFERENCES todo (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE todo_file ADD CONSTRAINT FK_D34E500F93CB796C FOREIGN KEY (file_id) REFERENCES file (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE token ADD CONSTRAINT FK_5F37A13B9D86650F FOREIGN KEY (user_id_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE acces_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE api_token_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE calendar_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE event_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE event_tags_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE file_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE invitation_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE tag_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE todo_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE token_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE "user_id_seq" CASCADE');
        $this->addSql('ALTER TABLE api_token DROP CONSTRAINT FK_7BA2F5EBA15303B9');
        $this->addSql('ALTER TABLE calendar DROP CONSTRAINT FK_6EA9A1469D86650F');
        $this->addSql('ALTER TABLE event_event DROP CONSTRAINT FK_7AB5BB8B6D130821');
        $this->addSql('ALTER TABLE event_event DROP CONSTRAINT FK_7AB5BB8B74F658AE');
        $this->addSql('ALTER TABLE event_calendar DROP CONSTRAINT FK_2845489671F7E88B');
        $this->addSql('ALTER TABLE event_calendar DROP CONSTRAINT FK_28454896A40A2C8');
        $this->addSql('ALTER TABLE event_tags_event DROP CONSTRAINT FK_82425D082CE61B');
        $this->addSql('ALTER TABLE event_tags_event DROP CONSTRAINT FK_82425D071F7E88B');
        $this->addSql('ALTER TABLE event_tags_tag DROP CONSTRAINT FK_E2303A1A82CE61B');
        $this->addSql('ALTER TABLE event_tags_tag DROP CONSTRAINT FK_E2303A1ABAD26311');
        $this->addSql('ALTER TABLE file DROP CONSTRAINT FK_8C9F36103E5F2F7B');
        $this->addSql('ALTER TABLE invitation DROP CONSTRAINT FK_F11D61A29D86650F');
        $this->addSql('ALTER TABLE invitation DROP CONSTRAINT FK_F11D61A213109D39');
        $this->addSql('ALTER TABLE invitation DROP CONSTRAINT FK_F11D61A23E5F2F7B');
        $this->addSql('ALTER TABLE tag DROP CONSTRAINT FK_389B7839D86650F');
        $this->addSql('ALTER TABLE tag_calendar DROP CONSTRAINT FK_5898DA9DBAD26311');
        $this->addSql('ALTER TABLE tag_calendar DROP CONSTRAINT FK_5898DA9DA40A2C8');
        $this->addSql('ALTER TABLE todo DROP CONSTRAINT FK_5A0EB6A09D86650F');
        $this->addSql('ALTER TABLE todo DROP CONSTRAINT FK_5A0EB6A03E5F2F7B');
        $this->addSql('ALTER TABLE todo_todo DROP CONSTRAINT FK_5DFD0BF3601EA51');
        $this->addSql('ALTER TABLE todo_todo DROP CONSTRAINT FK_5DFD0BF2FE4BADE');
        $this->addSql('ALTER TABLE todo_file DROP CONSTRAINT FK_D34E500FEA1EBC33');
        $this->addSql('ALTER TABLE todo_file DROP CONSTRAINT FK_D34E500F93CB796C');
        $this->addSql('ALTER TABLE token DROP CONSTRAINT FK_5F37A13B9D86650F');
        $this->addSql('DROP TABLE acces');
        $this->addSql('DROP TABLE api_token');
        $this->addSql('DROP TABLE calendar');
        $this->addSql('DROP TABLE event');
        $this->addSql('DROP TABLE event_event');
        $this->addSql('DROP TABLE event_calendar');
        $this->addSql('DROP TABLE event_tags');
        $this->addSql('DROP TABLE event_tags_event');
        $this->addSql('DROP TABLE event_tags_tag');
        $this->addSql('DROP TABLE file');
        $this->addSql('DROP TABLE invitation');
        $this->addSql('DROP TABLE tag');
        $this->addSql('DROP TABLE tag_calendar');
        $this->addSql('DROP TABLE todo');
        $this->addSql('DROP TABLE todo_todo');
        $this->addSql('DROP TABLE todo_file');
        $this->addSql('DROP TABLE token');
        $this->addSql('DROP TABLE "user"');
    }
}
