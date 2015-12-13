CREATE TABLE weapon
(id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(100) NOT NULL,
description TEXT,
proficiency ENUM('Simple','Martial'),
type SET('Melee','Ranged','Thrown'),
`range` VARCHAR(100),
cost NUMERIC(12,2),
damage VARCHAR(100),
damage_type_id INT,
weight FLOAT,
properties SET('Ammunition','Finesse','Heavy','Light','Loading','Reach','Special','Two-Handed','Versatile')
);



INSERT INTO weapon (
name,
proficiency,
type,
`range`,
cost,
damage,
damage_type_id,
weight,
properties
) VALUES (
'Dagger',
'Simple',
("Melee,Thrown"),
'20/60',
2,
'1d4',
0,
1,
("Finesse,Light")
);



CREATE TABLE damage_type
(id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(100) NOT NULL,
description TEXT
);

INSERT INTO damage_type (
name,
description
) VALUES 
('Acid',"The corrosive spray of a black dragon's breath and the dissolving enzymes secreted by a black pudding deal acid damage."),
('Bludgeoning',"Blunt force attacks–hammers, falling, constrictions, and the like–deal bludgeoning damage."),
('Cold',"The infernal chill radiating from an ice devil's spear and the frigid blast of a white dragons's breath deal cold damage."),
('Fire',"Red dragons breath fire, and many spells conjure flames to deal fire damage."),
('Force',"Force is pure magical energy focused into a damaging form. Most effects that deal force damage ore spells, including magic_missile and spiritual_weapon."),
('Lightning',"A lighting_bolt spell and a blue dragon's breath deal lightning damage."),
('Necrotic',"Necrotic damage, dealt by certain undead and spell such as chill_touch, withers matter and even the soul."),
('Piercing',"Puncturing and impaling attacks, including Spears and monsters' bites, deal piercing damage."),
('Poisen',"Venomous stings and the toxic gas of a green dragon's breath deal poison damage."),
('Psychic',"Mental abilities such as a mind flayer's psionic blast deal psychic damage."),
('Radiant',"Radiant damage, dealt by a cleric's flame_strike spell or an angel's smiting weapon, sears the flesh like fire and overloads the spirit with power."),
('Slashing',"Swords, axes, and monsters' claws deal slashing damage."),
('Thunder',"A concussive burst of sound, such as the effect of the thunderwave spell, deals thunder damage.");