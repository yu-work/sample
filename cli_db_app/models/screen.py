from sqlalchemy import Column, Integer, String, create_engine
from sqlalchemy.ext.declarative import declarative_base
from sqlalchemy.orm import sessionmaker

Base = declarative_base()

class Screen(Base):
    __tablename__ = 'screens'

    id = Column(Integer, primary_key=True)
    title = Column(String, nullable=False)
    link = Column(String)
    description = Column(String)

    def __repr__(self):
        return f"<Screen(title='{self.title}', link='{self.link}')>"

def init_db():
    db_path = 'sqlite:///screens.db'
    engine = create_engine(db_path, echo=True)
    Base.metadata.create_all(engine)
    Session = sessionmaker(bind=engine)
    return Session()
