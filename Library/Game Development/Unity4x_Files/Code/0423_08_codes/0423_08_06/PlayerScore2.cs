// file: PlayerScore2.cs

using System.Xml;
using System.Xml.Serialization;

[XmlRoot("player_score_2")]
public class PlayerScore2 
{ 
	private string _name; 
	private int _score;
	
 	[XmlElement("name")]
	public string Name {
		get{ return _name; }
		set{ _name = value; }
	}
	
 	[XmlElement("score")]
	public int Score {
		get{ return _score; }
		set{ _score = value; }
	}
	
	// default constructor, needed for serialization
	public PlayerScore2() {}
	
	public PlayerScore2(string newName, int newScore) {
		Name = newName;		
		Score = newScore;
	}
}
