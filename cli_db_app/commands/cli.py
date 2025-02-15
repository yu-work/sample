import typer
from rich.console import Console
from rich.table import Table
from ..models.screen import Screen, init_db

app = typer.Typer()
console = Console()
db_session = init_db()

@app.command()
def add(title: str, link: str = "", description: str = ""):
    """画面情報を追加します"""
    screen = Screen(title=title, link=link, description=description)
    db_session.add(screen)
    db_session.commit()
    console.print(f"[green]画面情報を追加しました: {title}[/green]")

@app.command()
def list():
    """全ての画面情報を表示します"""
    screens = db_session.query(Screen).all()
    
    table = Table(show_header=True, header_style="bold magenta")
    table.add_column("ID")
    table.add_column("タイトル")
    table.add_column("リンク")
    table.add_column("説明")

    for screen in screens:
        table.add_row(
            str(screen.id),
            screen.title,
            screen.link or "",
            screen.description or ""
        )
    
    console.print(table)

@app.command()
def update(
    id: int,
    title: str | None = None,
    link: str | None = None,
    description: str | None = None
):
    """指定したIDの画面情報を更新します"""
    screen = db_session.query(Screen).filter(Screen.id == id).first()
    if screen:
        if title:
            screen.title = title
        if link:
            screen.link = link
        if description:
            screen.description = description
        db_session.commit()
        console.print(f"[green]ID {id} の画面情報を更新しました[/green]")
    else:
        console.print(f"[red]ID {id} の画面情報が見つかりません[/red]")

@app.command()
def delete(id: int):
    """指定したIDの画面情報を削除します"""
    screen = db_session.query(Screen).filter(Screen.id == id).first()
    if screen:
        db_session.delete(screen)
        db_session.commit()
        console.print(f"[green]ID {id} の画面情報を削除しました[/green]")
    else:
        console.print(f"[red]ID {id} の画面情報が見つかりません[/red]")

def run():
    app()
