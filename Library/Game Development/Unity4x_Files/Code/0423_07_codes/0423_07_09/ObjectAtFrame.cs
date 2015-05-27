// file: ObjectAtFrame.cs
using UnityEngine;
using System.Collections;

public class ObjectAtFrame {
	public Vector3 position;
	public Quaternion rotation;
	
	public ObjectAtFrame(Vector3 newPosition, Quaternion newRotation) {
		position = newPosition;
		rotation = newRotation;
	}
}
